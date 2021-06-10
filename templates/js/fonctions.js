  /////////////////////////////
 /* Javascript fonctions.js */
/////////////////////////////

$(document).ready(function(){

  ///////////
  // Notation
  ///////////
  var srcIn="https://1.bp.blogspot.com/-XRthzlRuYrs/YMC_dAegCuI/AAAAAAAAB1U/hc6CGAtMEpkAriygqEa61Rt163gjIPmAwCLcBGAsYHQ/s0/star_in.gif"; //image au survol
  var srcOut="https://1.bp.blogspot.com/-iYuyJuFMNaI/YMC_mde4cwI/AAAAAAAAB1Y/TntkCwx8cg0oZ1-KUQYobW4HcNnC4FHxgCLcBGAsYHQ/s0/star_out.gif"; // image non survol�e

  // Obtenir id num�rique des �toiles au format star_numero
  function idNum(id)
  {
    var id=id.split('_');
    var id=id[1];
    return id;
  }

  // Survol des �toiles
  $('.star').hover(function(){
    var id=idNum($(this).attr('id')); // id num�rique de l'�toile survol�e
    var nbStars=$('.star').length; // Nombre d'�toiles de la classe .star
    var i; // Variable d'incr�mentation
    for (i=1;i<=nbStars;i++)
    {
      if(i<=id) $('#star_'+i).attr({src:srcIn});	
      else if(i>id) $('#star_'+i).attr({src:srcOut});
      if(i==id)$('#note').attr({value:i}); // affectation de la note au formulaire
    }
  },function(){});

  // Survol de la croix
  $('#clear_stars').hover(function(){
    $('.star').attr({src:srcOut});
    $('#note').attr({value:'0'});
  },function(){});
});
