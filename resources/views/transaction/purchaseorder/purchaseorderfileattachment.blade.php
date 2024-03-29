<div class="card">
    <div class="card-header" id="fileAttachment" data-toggle="collapse" data-target="#collapseFileAttachment" aria-expanded="true" aria-controls="collapseFileAttachment">
        <button class="btn btn-link p-0 text-reset" >
            <strong>File Attachments</strong>
        </button>
    </div>
    {{-- filepond --}}
    <div id="collapseFileAttachment" class="collapse show" aria-labelledby="fileAttachment">
        <div class="card-body">
            <ul class="list-group mb-3" id="fileAttachmentList">
                {{-- <li class="list-group-item">An item</li> --}}
                @forelse ($purchaseOrder->fileAttachments as $fileAttachment)
                <li class="list-group-item">
                    <a href="/storage/fileattachments/{{ $fileAttachment->transaction_type }}/{{ $fileAttachment->filename }}" target="_blank">{{ $fileAttachment->original_filename }}</a>
                    @if (!$purchaseOrder->complete_status)
                      <button data-toggle="modal" data-target="#modalDeleteFileAttachment{{ $fileAttachment->id }}" class="btn btn-sm btn-danger float-right"><i class="fas fa-trash"></i></button>
                      <div class="modal fade" id="modalDeleteFileAttachment{{ $fileAttachment->id }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete File Attachment</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="/fileattachment/delete/{{ $fileAttachment->id }}" method="POST">
                            <div class="modal-body">
                              <p>Please confirm to delete file: {{ $fileAttachment->original_filename }}</p>
                              @csrf
                              <input type="hidden" name="id" value="{{ $fileAttachment->id }}">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-sm btn-danger">Delete File</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    @endif
                    
                </li>
                @empty
                    
                @endforelse
            </ul>
            @if (!$purchaseOrder->complete_status)
              <form action="#" method="post" enctype="multipart/form-data">
              <input type="file" name="fileAttachment" multiple id="fileAttachment" allow-remove="false" data-userid="{{ Auth::user()->id }}" data-transactiontype="purchase_order" data-transactionid="{{ old('id', !is_null($purchaseOrder->id)? $purchaseOrder->id : null) }}">
            @endif
            
            
            </form>
        </div>
    </div>
</div>