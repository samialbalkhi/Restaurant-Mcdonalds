<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Answering_job_application;
use App\Http\Controllers\Controller;
use App\Service\Backend\EmailsSent;

class EmailsSentController extends Controller
{
   private $EmailsSent ;
   public function __construct(EmailsSent $EmailsSent)
   {
        $this->EmailsSent = $EmailsSent;
   }
    public function index()
    {
        return response()->json(
           $this->EmailsSent->index());
    }

    public function getAnswering(Answering_job_application $Answering_job_application)
    {
        return response()->json(
        $this->EmailsSent->getAnswering($Answering_job_application));
    }
}
