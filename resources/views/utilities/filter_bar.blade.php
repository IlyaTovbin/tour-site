<form action="{{ $url ?? '' }}" method="GET" class="input-group mb-3 filter-form">
    <div class="input-group-prepend">
      <button type="button" class="btn btn-outline-secondary"><i class="fas fa-list"></i></button>
      <select class="form-control select-option">
            <option value="">Все</option>
            @if($filterBy)
                @foreach ($filterBy as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            @endif
      </select>
    </div>
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
        let filterBy = $('.select-option').val();
        let filterByCreated = $('.select-by-newest').val();
        let search = $('.input-search').val();
        let url = $('.filter-form').attr('action');
        url = url + '?filterBy=' + filterBy + '&filterByCreated=' + filterByCreated + '&search=' + search;
        window.location.href = url;
    })

    $(document).ready(function() {
        var search = location.search.substring(1);
        if(search){
            search = JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
            $('.select-by-newest option[value='+ search.filterByCreated +']').attr('selected','selected');
            if(search.filterBy){
                $('.select-option option[value='+ search.filterBy +']').attr('selected','selected');
            }
            $('.input-search').val(search.search);
        }
        
    });

</script>