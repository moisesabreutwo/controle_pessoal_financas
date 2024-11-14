<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DadosExcepcionaisSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('CPF_dadosExcepcionais')->count() == 0) {
            DB::table('CPF_dadosExcepcionais')->insert([
                'enderecoLogo' => '/img/logo-jpinheiro.png',
                'conteudoTela' => 'MENSAGEM DA TELA',
                'nomeEmpresa' => 'Minha Empresa Ltda',
                'nomeFantasiaEmpresa' => 'Fantasia Empresa',
                'mensagemPositiva' => 'Obrigado por confiar na nossa empresa!',
                'valorDeposito' => 1000.00,
                'chavePix' => 'chave-pix-exemplo',
                'valorDepositoExtenso' => 'Mil reais',
                'moedaReferencia' => 'R$',
                'cnpjEmpresa' => '12345678000199',
                'emailContato' => 'contato@minhaempresa.com',
                'conteudoFoto' => '/img/500x500.jpg',
            ]);
        }
    }
}
