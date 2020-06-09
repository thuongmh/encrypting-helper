<?php

namespace thuongmh\helperEncryption;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EncryptionController extends Controller
{
    private $encryption;
    public function __construct(\thuongmh\helperEncryption\Encryption $encryption)
    {
        $this->encryption = $encryption;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $listKeyEncryption = $this->encryption->newQuery()->get();
        return view('thuongmh::list', compact('listKeyEncryption'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create ()
    {
        return view('thuongmh::create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store (Request $request)
    {
        DB::beginTransaction();
        try {
            $dataInsert = $request->all();
            unset($dataInsert['_token']);
            $dataInsert['value'] = encrypt($dataInsert['value']);
            if($this->encryption->newQuery()->insert($dataInsert)) {
                DB::commit();
                return redirect()->route('encryption.index')->withSuccess('Insert data success');
            }
            DB::rollBack();
        } catch (\Exception $e) {
            return redirect()->route('encryption.create')->withInput($request->all())->withErrors('Error when install data');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit ($id)
    {
        $keyEncryption = $this->encryption->newQuery()->find($id);

        if(empty($keyEncryption)) {
            return redirect()->route('encryption.index');
        }
        $keyEncryption->value = decrypt($keyEncryption->value);
        return view('thuongmh::edit', compact('keyEncryption'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update ($id, Request $request)
    {
        $keyEncryption = $this->encryption->newQuery()->find($id);
        if(empty($keyEncryption)) {
            return redirect()->route('encryption.index');
        }
        $dataUpdate = $request->all();
        unset($dataUpdate['_token']);
        $dataUpdate['value'] = encrypt($dataUpdate['value']);
        DB::beginTransaction();
        try {
            if($keyEncryption->update($dataUpdate)) {
                return redirect()->route('encryption.index')->withSuccess('Update success');
            }
        } catch (\Exception $e) {
            return redirect()->route('encryption.edit')->withInput($request->all())->withErrors('Update error');
        }
    }

    public function destroy ($id)
    {
        $keyEncryption = $this->encryption->newQuery()->find($id);
        if(empty($keyEncryption)) {
            return redirect()->route('encryption.index');
        }
        if($keyEncryption->delete()) {
            return redirect()->route('encryption.index')->withSuccess('Delete success');
        }
        return redirect()->route('encryption.index')->withErrors('Delete error');
    }
}
