<?php

namespace App\Controllers\Admin;

use App\Models\AssessmentModel;
use App\Controllers\BaseController;

class Assessment extends BaseController
{
    protected $assessmentModel;
    public function __construct()
    {
        $this->assessmentModel = new AssessmentModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $assessment = $this->assessmentModel->prep();
        $data = [
            'title' => 'Assessment',
            'title_slug' => 'Assessment',
            'assessment' => $assessment
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getAssessment($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        return json_encode($this->assessmentModel->search('id', $id));
    }
    function create($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            $send = [
                'assessment' => $data['assessment'],
            ];
            if ($id != null) {
                $send['id'] = $id;
            }
            if ($this->assessmentModel->save($send)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('kosong');
        }
    }
    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->assessmentModel->delete_by_id($id)) {
            return json_encode('berhasil');
        }
    }
    //--------------------------------------------------------------------

}
