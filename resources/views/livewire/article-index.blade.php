<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    @if ($statusUpdate)

    <livewire:article-update></livewire:article-update>
    @else
    <livewire:article-create></livewire:article-create>
    @endif
    <hr>
    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control form-control-sm" placeholder="Seacrh" wire:model="search">
        </div>
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($articles as $article)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->description}}</td>
                <td>
                    <button wire:click="getArticle({{$article->id}})"
                        class="btn btn-sm btn-info text-white mb-2">Edit</button>
                    <button wire:click="destroy({{$article->id}})"
                        class="btn btn-sm btn-danger text-white">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$articles->links()}}
</div>
