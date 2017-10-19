<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ItemConfig;

class ItemConfigController extends Controller
{
    public function listar()
    {
        return view('item_config/itens_config', [
            'listaItens' => ItemConfig::orderBy('no_item')->get(),
            'categoriasItens' => DB::table('categoriaitem')->get(),
         ]);
    }

    public function inserir(Request $req)
    {
        $dados = $req->except('_token');
        $count = ItemConfig::where('no_item', $req->no_item)->count();

        if ($count == 0) {
            $item = new ItemConfig();
            $item->fill($dados)->save();

            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro efetuado com sucesso.',
                ]);
        } else {
            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'warning',
                    'msg' => 'Já existe um Item de configuração de mesmo nome.',
                ])->withInput();
        }
    }

    // fim inserir

    public function detalhar($id)
    {
        $categoria = DB::table('categoriaitem')->where('id', $item->categoriaitem_id)->first();

        return view('item_config/item_config', [
            'item' => ItemConfig::findOrFail($id),
            'categoria' => $categoria,
         ]);
    }

    public function altera($id)
    {
        return view('item_config/altera_item_config', [
            'item' => ItemConfig::findOrFail($id),
            'categoriasItens' => DB::table('categoriaitem')->get(),
         ]);
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->except('_token');
        $item_config = new ItemConfig();
        $item_config->findOrFail($id)->update($dados);

        return redirect()
            ->route('itens_config')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro alterado com sucesso.',
            ]);
    }

    public function apagar($id)
    {
        ItemConfig::findOrFail($id)->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro excluído com sucesso.',
            ]);
    }
}
