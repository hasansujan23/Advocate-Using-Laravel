$('.editPlaintiffBtn').click(function(event){
      event.preventDefault();
      alert('hello');
      console.log('ok');
        //var url1=$(this).attr('href');
        //confirm("Are You sure want to delete !");
        // $.get(url1, function(data){
        //  printPlaintiff(advocateCaseNo);
        // });
});


function printPlaintiff(advocateCaseNo){
        $.get("{{ route('getAllPlaintiff') }}?c_no="+advocateCaseNo, function(data){
          $('#allPlaintiff').html(data);
        });
}


var output='';
          for(var cnt=0;cnt<data.length;cnt++){
            output+='<tr>';
            output+='<td>'+cnt+'</td>';
            output+='<td>'+data[cnt].name+'</td>';
            output+='<td>'+data[cnt].address+'</td>';
            output+='<td>'+data[cnt].contact+'</td>';
            output+='<td>'+data[cnt].comment+'</td>';
            output+='<tr>';
          }
          $('#allPlaintiff').html(output);