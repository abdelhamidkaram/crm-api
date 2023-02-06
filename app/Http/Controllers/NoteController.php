<?php

namespace App\Http\Controllers;

use Crm\Base\BaseApiRequest;
use Crm\Customer\Services\NoteServices;
use Illuminate\Http\Request;


class NoteController extends Controller
{

  private NoteServices $noteService;
  public function __construct(NoteServices $noteService)
  {
    $this->noteService = $noteService;
  }

  public function index( $customerId)
  {
    return $this->noteService->index($customerId);
  }

  public function create(Request $request)
  {
    return $this->noteService->create($request);
  }

  public function update(Request $request,  $customerId,  $noteId)

  {
    return $this->noteService->update($request, $customerId, $noteId);
  }

  public function delete(Request $request, $noteId, $customerId)
  {
    return $this->noteService->delete($request,$customerId, $noteId);
  }

  public function show(Request $request,  $customerId, $noteId)
  {
    return $this->noteService->show($request, $customerId, $noteId);
  }


}
