<select name="{{$field ?? 'chanel_id'}}" id="{{$field ?? 'chanel_id'}}">
        @foreach ($chanels as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
</select>