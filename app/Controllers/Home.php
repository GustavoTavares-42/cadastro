<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Home extends BaseController
{
    public function index()
    {
        return view('cadastro');
    }

    // public function insertForm()
    // {
    //   $pessoasModel = new \App\Models\Pessoas;
    //   $request = service('request');
    //   $nome = $request->getPost('nome');
    //   $cpf = $request->getPost('cpf');
    //   $data = $request->getPost('data');
    //   $dados = [
    //       'nome' => $nome,
    //       'cpf' => $cpf,
    //       'data_nasc' => $data
    //   ];

    //   $pessoasModel->insertPessoasForm($dados);
    //   return redirect()->to(site_url('/'));
    // }

    public function insertFile()
    {
        $validation = \Config\Services::validation();
        $file = $this->request->getFile('import');
        $validation->setRules(['import' => 'ext_in[import, csv]'],
                                 ['import' => ['ext_in' => 'O Arquivo deve possuir extensão .csv',
                                  'required' => 'Selecione um arquivo!']]);

        if($validation->run())
        {
            $erros = $validation->listErrors();
            $session = session();
            $session->setFlashdata("message", "<div  style='color: red; margin-top:60px;'> $erros </div>");
            return redirect()->to(site_url('/'));
        }
        else
        {
           $newName = $file->getRandomName();
           $file->move(WRITEPATH . 'uploads', $newName);

           if(($open = fopen(WRITEPATH .'uploads'.'\\'.$newName,'r')) != FALSE)
           {
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
                {
                    $array[] = $data;
                }
            fclose($open);
           }

           for ($i=2; $i<count($array); $i++)
           {
                $pessoasModel = new \App\Models\Pessoas;
                $dados = [
                    'nome' => $array[$i][1],
                    'cpf' => $array[$i][2],
                    'data_nasc' => $$array[$i][3]
                ];
        
                $pessoasModel->insertPessoasForm($dados);
                return redirect()->to(site_url('/'));  
           }
        }

    }
}
