<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use OpenAI;
use App\Models\FormData;
//use Alert;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileGeneratorController extends Controller
{
    public function __invoke(
        Request $request,
    )
    : 
    View 
    {
        $openAIClient = OpenAI::client(config('openai.api-key'));
        $profileContent = $request->get('content');
        $documentNameContent = $request->get('dname');
        $documentNumberContent = $request->get('dnumber');
        $revisionNumberContent = $request->get('rnumber');
        $approvedByContent = $request->get('approve');
        $creationDateContent = $request->get('creationdate');
        $policyTypeContent = $request->get('ptype');

        $profile = $openAIClient
            ->completions()
            ->create([
                "model" => "text-davinci-003",
                "temperature" => 0.8,
                "top_p" => 1,
                "frequency_penalty" => 1,
                "presence_penalty" => 0,
                'max_tokens' => 1000,
                'prompt' => "Write me a professional policy about {$profileContent}",
            ]);
        $dname = $documentNameContent;
        $dnumber = $documentNumberContent;
        $rnumber = $revisionNumberContent;
        $approve = $approvedByContent;
        $creationdate = $creationDateContent;
        $ptype = $policyTypeContent;

        
        return view('profile_generators.create', 
        [
            'dname' => trim($dname),
            'dnumber' => trim($dnumber),
            'rnumber' => trim($rnumber),
            'approve' => trim($approve),
            'creationdate' => trim($creationdate),
            'ptype' => trim($ptype),
            'profile' => trim($profile->choices[0]->text),
        ]);
        Alert::success('Success', 'Data saved successfully!');
       
    }

   /*  Next step implemetation - Model & Migration created
   
   public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $data = new FormData;

        $data->dname = $request->input('dname');
        $data->dnumber = $request->input('dnumber');
        $data->rnumber = $request->input('rnumber');
        $data->approve = $request->input('approve');
        $data->creationdate = $request->input('creationdate');
        $data->ptype = $request->input('ptype');
        $data->profile = $request->input('profile');

        $data->save();

        return redirect('/generate-policy')->with('success', 'Policy Data submitted successfully in Database.');
    } */
}
