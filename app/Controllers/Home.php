<?php

namespace App\Controllers;

use Da\QrCode\QrCode;
use \App\Models\UrlModel;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function save()
    {
		// validate
        $validations = [
            'url' => 'required',
        ];
        if ($this->validate($validations)) {
			helper('text');
			// Insert the data into the database table
			$urlModel = new \App\Models\UrlModel();
			$key = random_string('alnum', 16);
			$save = $urlModel->save([
				'key'=> $key,
				'url'=>$this->request->getVar('url')
			]);
			if($save){
				return $this->response->setJson(['status'=>true, 'key'=> $key, 'url'=> base_url($key), 'url_qrcode'=>base_url('/qrcode/'.$key)]);
			}
        }
		return $this->response->setJson(['status'=>false]);
    }

    public function qrcode($key)
    {
		$urlModel = new UrlModel();
		$query = $urlModel->where('key', $key)->first();
		if(!isset($query)){
			return false;
		}
        $qrCode = (new QrCode($query['url']))
            ->setSize(250)
            ->setMargin(5)
            ->useForegroundColor(51, 153, 255);
        // display directly to the browser
        header('Content-Type: ' . $qrCode->getContentType());
        return $qrCode->writeString();
    }

	public function redirect($key)
    {
		// redirect
		$urlModel = new UrlModel();
		$query = $urlModel->where('key', $key)->first();
		if(isset($query)){
			return redirect()->to($query['url']);
		}
		$this->load->view('404');
    }

	public function historyView()
    {
        return view('history');
    }

	public function historyList()
    {
		$page = 1;
		// page change
		if($this->request->getVar('page')){
			$page = $this->request->getVar('page');
		}
		// list items all
        $urlModel = new UrlModel();
		$urlModel = $urlModel->orderBy('id', 'DESC');
		$all = $urlModel->paginate(10, 'default', $page);
		$rows = $urlModel->countAllResults();
		// change key to url short
		foreach ($all as $key => $value) {
			$all[$key]['key'] = base_url($value['key']);
		}
		return $this->response->setJson(['data'=>$all, 'rows'=>$rows]);
    }
	
}
