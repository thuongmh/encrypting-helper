@extends('thuongmh::app')
@section('content')
<h3>List Key Encryption</h3>
<a class="btn btn-primary" href="{{ route('encryption.create') }}">Create key encryption</a>
<table id="" class="table table-bordered table-striped" cellspacing="0" style="margin-top: 20px">
    <thead>
    <tr>
        <th>Key</th>
        <th>Value</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($listKeyEncryption as $keyEncryption)
        <tr>
            <td>{{ $keyEncryption->key }}</td>
            <td style=" word-break: break-all;">{{ $keyEncryption->value }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('encryption.edit', $keyEncryption->id) }}" style="color: white">
                    Edit
                </a>
                <a class="btn btn-danger btn-sm" href="{{ route('encryption.destroy', $keyEncryption->id) }}" style="color: white">
                    Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
