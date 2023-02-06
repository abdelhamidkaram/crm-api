<?php

namespace Crm\Customer\Services;

use App\Crm\events\NewNote;
use Crm\Customer\Models\note;
use Crm\Customer\Repositories\NoteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteServices
{
    private NoteRepository $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository =  $noteRepository;
        
    }
    
    public function index($customerId)
    {
        return $this->noteRepository->all($customerId);
    }


    public function create(Request $request)
    {
        $note = $this->noteRepository->create([
            'note'=>$request->note ,
            'customerId'=>$request->customerId ,
        ]);
        event(new NewNote($note));

        return $note ; 
    }

    public function update(Request $request, $customerId, $noteId)
    {
       return $this->noteRepository->update(['note'=>$request->get('note')],$noteId, $customerId  ) ;
    }

    public function delete(Request $request,$noteId, $customerId)
    {
        return $this->noteRepository->delete($noteId,$customerId) ;
    }


    public function show(Request $request, $customerId, $noteId)
    {
        return $this->noteRepository->show($noteId,$customerId);
    }
}
