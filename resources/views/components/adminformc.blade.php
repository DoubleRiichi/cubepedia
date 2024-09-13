
    <div class="row">
                <div class="col">
                    <form action="{{$route}}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col">
                                <textarea class="form-control preserve-lines" name="comment" rows="10"></textarea>
                            </div>
                        </div>

                        <input type="text" name="id"  value="{{$id}}" hidden>
                        
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success" type="submit">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
