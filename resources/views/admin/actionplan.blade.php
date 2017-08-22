@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Action</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ap as $r)
                <tr>
                    <td>{{ $r->id_action_plan }}</td>
                    <td>{{ $r->nama_action_plan }}</td>
                    <td><form action='{{route('admin.dashboard')}}' method='post'>
                      {{ csrf_field() }}
                        <input type='hidden' name='id_ap' value='{{ $r->id_action_plan }}'/>
                        <input class='btn btn-success' type='submit' value='Edit' />
                        </form></td>
                    <td><form action='{{route('admin.ap.delete')}}' method='post'>
                      {{ csrf_field() }}
                        <input type='hidden' name='id_ap' value='{{ $r->id_action_plan }}'/>
                        <input class='btn btn-danger' type='submit' value='Delete' />
                    </form>
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
