
    var seconds = 5;
      setInterval(
        function(){
          document.getElementById('seconds').innerHTML = --seconds;
        }, 1000
      );
