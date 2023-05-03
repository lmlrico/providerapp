<form id="update-form">
    <input type='hidden' name='id' id="id_edit" value="{{ $provider['id'] }}">
    <div class="mb-3">
        <label for="provider_name" class="form-label">Name of Provider</label>
        <input type="text" class="form-control" id="provider_name_edit" maxlength="256" value="{{ $provider['provider_name'] }}" required>
    </div>
    <div class="mb-3">
        <label for="provider_url" class="form-label">URL</label>
        <input type="text" class="form-control" id="provider_url_edit" maxlength="256" value="{{ $provider['provider_url'] }}" required>
    </div>
</form>