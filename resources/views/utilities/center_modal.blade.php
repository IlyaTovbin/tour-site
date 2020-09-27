<div class="modal fade" id="{{ $modal_id ?? '' }}" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLongTitle">{{ $title ?? '' }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $body ?? '' }}
        <span class="text-danger error-place"></span>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn {{ $action2 ?? 'btn-secondary' }}" data-dismiss="modal">{{ $action2Name ?? 'Отмена' }}</button>
        <button type="button" class="btn {{ $action }}">{{ $actionName ?? 'Создать' }}</button>
      </div>
    </div>
  </div>
</div>