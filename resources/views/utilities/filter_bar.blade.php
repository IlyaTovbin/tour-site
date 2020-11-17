<form action="{{ $url ?? '' }}" method="GET" class="input-group mb-3 filter-form">
    @if(isset($filterBy))
    <div class="input-group-prepend">
      <button type="button" class="btn btn-outline-secondary"><i class="fas fa-list"></i></button>
      <select class="form-control select-option-filterBy">
            <option value="">Все</option>
            @foreach ($filterBy as $item)
                <option value="{{ $item->id ?? $item['id']}}">{{ $item->name ?? $item['type'] }}</option>
            @endforeach
      </select>
    </div>
    @endif
    @if(!isset($active_off))
    <div class="input-group-prepend">
        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-toggle-on"></i></i></button>
        <select class="form-control select-by-active">
              <option value="">Все</option>
              <option value="1">Активные</option>
              <option value="0">Не активные</option>
        </select>
    </div>
    @endif
    <div class="input-group-prepend">
        <button type="button" class="btn btn-outline-secondary"><i class="far fa-calendar-alt"></i></button>
        <select class="form-control select-by-newest">
              <option value="DESC">Новые</option>
              <option value="ASC">Старые</option>
        </select>
    </div>
    <input type="text" class="form-control input-search" placeholder="Поиск...">
    <button type="submit" class="btn btn-primary">Поиск</button>
</form>

<script>
    $('.filter-form').on('submit', function(e){
        e.preventDefault();
        let filterBy = $('.select-option-filterBy').val();
        let active = $('.select-by-active').val();
        if(active == undefined) active = '';
        let filterByCreated = $('.select-by-newest').val();
        let search = $('.input-search').val();
        let url = $('.filter-form').attr('action');
        url = url + '?filterBy=' + filterBy + '&active=' + active + '&filterByCreated=' + filterByCreated + '&search=' + search;
        window.location.href = url;
    })

    $(document).ready(function() {
        var search = location.search.substring(1);
        if(search){
            search = JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
            $('.select-by-newest option[value='+ search.filterByCreated +']').attr('selected','selected');
            if(search.filterBy){
                $('.select-option-filterBy option[value='+ search.filterBy +']').attr('selected','selected');
            }
            if(search.active){
                $('.select-by-active option[value='+ search.active +']').attr('selected','selected');
            }
            $('.input-search').val(search.search);
        }
        
    });

</script>