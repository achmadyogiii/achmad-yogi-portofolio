<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create project</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-900">
    <main class="mx-auto max-w-3xl px-6 py-12">
        <a class="text-sm text-indigo-700 hover:text-indigo-900" href="{{ route('portfolio') }}">← Kembali ke portfolio</a>
        <div class="mt-8 rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <h1 class="text-3xl font-semibold tracking-tight">Tambah project</h1>
            <p class="mt-2 text-slate-500">Publikasikan karya baru ke halaman portfolio.</p>
            @if (session('status')) <p class="mt-4 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-700">{{ session('status') }}</p> @endif
            @if ($errors->any()) <div class="mt-4 rounded-lg bg-rose-50 p-3 text-sm text-rose-700">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div> @endif
            <form class="mt-8 space-y-5" method="POST" action="{{ route('admin.projects.store') }}">
                @csrf
                <div><label class="text-sm font-medium" for="title">Judul</label><input class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="title" name="title" value="{{ old('title') }}" required></div>
                <div><label class="text-sm font-medium" for="slug">Slug</label><input class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="slug" name="slug" value="{{ old('slug') }}" required></div>
                <div><label class="text-sm font-medium" for="excerpt">Ringkasan</label><textarea class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt') }}</textarea></div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <div><label class="text-sm font-medium" for="category">Kategori</label><input class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="category" name="category" value="{{ old('category') }}" required></div>
                    <div><label class="text-sm font-medium" for="year">Tahun</label><input class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="year" name="year" type="number" min="2000" max="2100" value="{{ old('year', now()->year) }}" required></div>
                </div>
                <div><label class="text-sm font-medium" for="image_url">URL gambar</label><input class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="image_url" name="image_url" type="url" value="{{ old('image_url') }}"></div>
                <div><label class="text-sm font-medium" for="description">Deskripsi</label><textarea class="mt-2 w-full rounded-lg border-slate-300 px-3 py-2" id="description" name="description" rows="5">{{ old('description') }}</textarea></div>
                <label class="flex items-center gap-2 text-sm"><input name="is_published" type="checkbox" value="1" @checked(old('is_published'))> Publikasikan sekarang</label>
                <button class="rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700" type="submit">Simpan project</button>
            </form>
        </div>
    </main>
</body>

</html>