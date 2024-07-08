<script>
    // start typeahead
    $(document).ready(function(){
        var routes = <?php echo json_encode(Helper::get_route_names()); ?>;
        
        var routes = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: routes
        });
        
        $('#routes-search').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'routes',
            source: routes
        });

        $('#routes-search').on('typeahead:selected', function(event, suggestion, dataset) {
            $('#redirectForm input[name="route"]').val(suggestion);
            $('#redirectForm').submit();
        });
    });
    // end typeahead
</script>