@if($project->exists)
    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data" novalidate>
    @method('PUT')


@else
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data" novalidate>

@endif

    @csrf
    <div class="row">
        {{-- Title --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @elseif(old('title', '')) is-valid @enderror" id="title" placeholder="Titolo..." value="{{old('title', $project->title)}}" required>
                @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci il titolo del progetto
                    </div>
                @enderror
            </div>
        </div>

        {{--? Slug --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" value="{{Str::slug(old('title', $project->title))}}" disabled>                
            </div>
        </div>

        {{-- Technologies --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="technologies" class="form-label">Tecnologie utilizzate</label>
                <input type="text" name="technologies" class="form-control @error('technologies') is-invalid @elseif(old('technologies', '')) is-valid @enderror" id="technologies" placeholder="HTML, CSS..."  value="{{old('technologies', $project->technologies)}}" required>
                @error('technologies')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci le tecnologie utilizzate
                    </div>
                @enderror
            </div>
        </div>

        {{-- Type --}}
        <div class="col-3"> 
            <label for="type" class="form-label">Tag</label>
            <select class="form-select" id="type" name="type_id">
                <option value="">Nessuno</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" @if (old('type_id', $project->type?->id) == $type->id) selected @endif>{{$type->label}}</option>                 
                @endforeach
            </select>
        </div>

        {{-- Description --}}
        <div class="col-12">
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione del progetto</label>
                <textarea class="form-control @error('description') is-invalid @elseif(old('description', '')) is-valid @enderror" name="description" id="description" rows="15">{{old('description', $project->description)}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci una descrizione
                    </div>
                @enderror
            </div>
        </div>

        {{-- Url --}}
        <div class="col-6">
            <div class="mb-3">
                <label for="url" class="form-label">Indirizzo al progetto</label>
                <input type="url" name="url" class="form-control @error('url') is-invalid @elseif(old('url', '')) is-valid @enderror" id="url" placeholder="https..."  value="{{old('url', $project->url)}}">
                @error('url')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci un url
                    </div>
                @enderror
            </div>
        </div>

        {{--? Image con url--}}
        {{-- <div class="col-5">
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="url" name="image" class="form-control @error('image') is-invalid @elseif(old('image', '')) is-valid @enderror" id="image" placeholder="https..." value="{{old('image', $project->image)}}">
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci un url di un'immagine
                    </div>
                @enderror
            </div>
        </div> --}}

        {{--? Immagine con file--}}
        <div class="col-5">
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @elseif(old('image', '')) is-valid @enderror" id="image" placeholder="http:// o https://" value="{{old('image', $project->image)}}">
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Carica un'immagine
                    </div>
                @enderror
            </div>
        </div>

        {{-- Preview immagine --}}
        <div class="col-1">
            <img src="{{old('image', $project->image ) 
            ? asset('storage/' . old('image', $project->image)) 
            : 'https://marcolanci.it/boolean/assets/placeholder.png'}}" alt="{{$project->title}}" id="preview" class="img-fluid">
        </div>

        {{-- Start date --}}
        <div class="col-4">
            <div class="mb-3">
                <label for="start_date" class="form-label">Data di inizio</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @elseif(old('start_date', '')) is-valid @enderror" id="start_date" placeholder="20-03-2024"  value="{{old('start_date', $project->start_date)}}">
                @error('start_date')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci una data di inizio
                    </div>
                @enderror
            </div>
        </div>

        {{-- End date --}}
        <div class="col-4">
            <div class="mb-3">
                <label for="end_date" class="form-label">Data di fine</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @elseif(old('end_date', '')) is-valid @enderror" id="end_date" placeholder="20-03-2024"  value="{{old('end_date', $project->end_date)}}">
                @error('end_date')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @else
                    <div class="form-text">
                        Inserisci una data superiore a quella di inizio
                    </div>
                @enderror
            </div>
        </div>

        {{-- Status --}}
        <div class="col-4">
            <label for="status" class="form-label">Status</label>
            <select class="form-select form-select-md @error('status') is-invalid @elseif(old('status', '')) is-valid @enderror" id="status" name="status">                    
                <option value="Completato" {{ old('status', $project->status) === 'Completato' ? 'selected' : '' }}>Completato</option>
                <option value="In corso" {{ old('status', $project->status) === 'In corso' ? 'selected' : '' }}>In corso</option>
                <option value="Cancellato" {{ old('status', $project->status) === 'Cancellato' ? 'selected' : '' }}>Cancellato</option>
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @else
                <div class="form-text">
                    Seleziona uno status
                </div>
            @enderror
        </div>

    </div>

    {{-- Pulsanti --}}
    <div class="d-flex align-items-center justify-content-between my-4">
        <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Torna indietro</a>

        <div class="d-flex align-items-center justify-content-between gap-2">
            <button type="reset" class="btn btn-danger"><i class="fas fa-eraser me-2"></i>Svuota i campi</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>
        </div>
    </div>
</form>