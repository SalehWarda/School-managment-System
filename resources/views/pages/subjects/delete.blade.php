<div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('admin.subjects.delete')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('subjects.Delete_Subject') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> {{trans('subjects.Delete') }}  : {{$subject->name}}</p>
                    <input type="hidden" name="id" value="{{$subject->id}}">
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{trans('subjects.Close') }}
                        </button>
                        <button type="submit"
                                class="btn btn-danger">{{trans('subjects.Delete_Action') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
