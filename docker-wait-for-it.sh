#!/usr/bin/env bash
#   Use this script to test if a given TCP host/port are available

TIMEOUT=15
QUIET=0
HOST=""
PORT=""
DELAY=0

echoerr() { if [ "$QUIET" -ne 1 ]; then echo "$@" 1>&2; fi }

usage()
{
    echo "Usage: $0 host:port [-t timeout] [-- command args]"
    echo "  -q | --quiet       Do not output any status messages"
    echo "  -t TIMEOUT         Timeout in seconds, zero for no timeout"
    echo "  -d DELAY           Wait DELAY seconds before executing command"
    echo "  -- COMMAND ARGS    Execute command with args after the test finishes"
    exit 1
}

wait_for()
{
    if [ "$TIMEOUT" -gt 0 ]; then
        echoerr "$0: waiting $TIMEOUT seconds for $HOST:$PORT"
    else
        echoerr "$0: waiting for $HOST:$PORT without a timeout"
    fi
    start_ts=$(date +%s)
    while :
    do
        (echo > /dev/tcp/$HOST/$PORT) >/dev/null 2>&1
        result=$?
        if [ $result -eq 0 ] ; then
            end_ts=$(date +%s)
            echoerr "$0: $HOST:$PORT is available after $((end_ts - start_ts)) seconds"
            break
        fi
        sleep 1
        if [ "$TIMEOUT" -gt 0 ] && [ $(( $(date +%s) - start_ts )) -ge "$TIMEOUT" ]; then
            echoerr "$0: timeout occurred after waiting $TIMEOUT seconds for $HOST:$PORT"
            exit 1
        fi
    done
    sleep $DELAY
    return 0
}

wait_for_wrapper()
{
    # In order to support SIGINT during timeout: http://unix.stackexchange.com/a/57692
    if [ "$QUIET" -eq 1 ]; then
        timeout "$TIMEOUT" "$0" "$HOST:$PORT" -q -t 1 &
    else
        timeout "$TIMEOUT" "$0" "$HOST:$PORT" -t 1 &
    fi
    PID=$!
    trap "kill -INT -$PID" INT
    wait $PID
    return $?
}

while [[ $# -gt 0 ]]
do
    case "$1" in
        *:* )
        HOST=$(echo $1 | cut -d : -f 1)
        PORT=$(echo $1 | cut -d : -f 2)
        shift 1
        ;;
        -q | --quiet)
        QUIET=1
        shift 1
        ;;
        -t)
        TIMEOUT="$2"
        if [ "$TIMEOUT" = "" ]; then break; fi
        shift 2
        ;;
        --timeout=*)
        TIMEOUT="${1#*=}"
        shift 1
        ;;
        -d)
        DELAY="$2"
        if [ "$DELAY" = "" ]; then break; fi
        shift 2
        ;;
        --delay=*)
        DELAY="${1#*=}"
        shift 1
        ;;
        --)
        shift
        break
        ;;
        --help)
        usage
        ;;
        *)
        echoerr "Unknown argument: $1"
        usage
        ;;
    esac
done

if [ "$HOST" = "" ] || [ "$PORT" = "" ]; then
    echoerr "Error: you need to provide a host and port to test."
    usage
fi

wait_for

if [ "$#" -gt 0 ]; then
    exec "$@"
else
    exit 0
fi
