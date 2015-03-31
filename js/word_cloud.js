	
	function generate_cloud()
	{
	var w= document.getElementById('displayhere').offsetWidth;
	var h= 800 ;
	var display_w = 0.8 * w  , display_h = h ;
	var fill = d3.scale.category20();
	var i =1;
	var j = 0;
	var t_x= w/2.518 , t_y= h /2.618;
	var sat_words=[];
	var words_temp=[];
	w_limit = w / 6.854;
	if(getCookie_raw('cloud_content') == '')
	while( i< Number(getCookie('i') ) )
	{
		if(sat_words.length <w_limit)
		sat_words [sat_words.length ] = getElement('word'.concat(String(i)) );
		i++;
	}
	
	if(getCookie('cloud_content') == 'definition')
	while( i<= Number(getCookie('i') ) )
	{
		words_temp = [getElement('word'.concat(String(i)) )].concat(getElement('definition1'.concat(String(i)) ).split(' '));
		for(j=0;j<words_temp.length;j++)
		if(sat_words.length <w_limit)
		sat_words [sat_words.length ] = words_temp[j];
		i++;
	}
	
	
	if(getCookie('cloud_content') == 'sentence')
	while( i<= Number(getCookie('i') ) )
	{
		words_temp = [getElement('word'.concat(String(i)) )].concat(getElement('definition1'.concat(String(i)) ).split(' '),getElement('sentence1'.concat(String(i)) ).split(' '));
		for(j=0;j<words_temp.length;j++)
		if(sat_words.length <w_limit)
		sat_words [sat_words.length ] = words_temp[j];
		i++;
	}
		
  d3.layout.cloud().size([w, h])
      .words(sat_words.map(function(d) {
        return {text: d, size: 10 + Math.random() * 40};
      }))
//      .padding(5)
      .rotate(function() { if(Math.random()*3>2) return ~~(Math.random() * 2) * 59; 
	  						else if(Math.random()*3<1) return ~~(Math.random() *Math.random() * 4) * (-37);
							else return ~~(Math.random() * Math.random() * 5) * (23);})
      .font("Impact")
      .fontSize(function(d) { return d.size; })
      .on("end", draw)
      .start();
	  
	  document.getElementById('status').innerHTML='';

function draw(words) {
    d3.select("#displayhere").append("svg")
        .attr("width", display_w)
        .attr("height", display_h)
      .append("g")
       .attr("transform", "translate(".concat(String(t_x),',',String(t_y),")" ))
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("font-family", "Impact")
        .style("fill", function(d, i) { return fill(i); })
        .attr("text-anchor", "middle")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; });
  }
	}
	  

