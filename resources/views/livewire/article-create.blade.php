<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control @error('title')
                    is-invalid  @enderror" wire:model="title" placeholder="Title" >
                    @error('title')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" class="form-control @error('description')
                    is-invalid  @enderror" wire:model="description" placeholder="Description">
                    @error('description')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary mb-3">Submit
            </button>
    </form>
</div>
