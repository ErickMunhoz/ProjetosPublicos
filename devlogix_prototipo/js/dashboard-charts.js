(function() {
  var data = {
    lineChart: [
      { date: '2023-01-01', label: 'Jan', value: 12 },
      { date: '2023-02-01', label: 'Fev', value: 19 },
      { date: '2023-03-01', label: 'Mar', value: 15 },
      { date: '2023-04-01', label: 'Abr', value: 22 },
      { date: '2023-05-01', label: 'Mai', value: 30 },
      { date: '2023-06-01', label: 'Jun', value: 25 }
    ],
    pieChart: [
      { color: 'blue', title: 'Concluídas', value: 85 },
      { color: 'red', title: 'Pendentes', value: 15 }
    ],
    lineChart2: [
      { date: '2023-01-01', label: 'Jan', value: 10 },
      { date: '2023-02-01', label: 'Fev', value: 14 },
      { date: '2023-03-01', label: 'Mar', value: 18 },
      { date: '2023-04-01', label: 'Abr', value: 20 },
      { date: '2023-05-01', label: 'Mai', value: 28 },
      { date: '2023-06-01', label: 'Jun', value: 22 }
    ],
    pieChart2: [
      { color: 'orange', title: 'Produto<br>com Defeito', value: 40 },
      { color: 'green', title: 'Erro no Pedido', value: 35 },
      { color: 'purple', title: 'Outro', value: 25 }
    ]
  };


// document.getElementById("proposta-btn").addEventListener("click", function (e) {
// e.preventDefault();
// const content = document.getElementById("proposta-content");
// content.style.display = content.style.display === "none" ? "block" : "none";
// });

  function drawPieChart(elementId, pieData, customWidth, customHeight) {
    var containerEl = document.getElementById(elementId),
        width = customWidth || containerEl.clientWidth || 300,
        height = customHeight || width * 0.6,
        radius = Math.min(width, height) / 2;

    var svg = d3.select(containerEl).append('svg')
      .attr('width', width)
      .attr('height', height)
      .append('g')
      .attr('transform', 'translate(' + width / 2 + ',' + height / 2 + ')');

    var arc = d3.svg.arc().outerRadius(radius - 10).innerRadius(0);
    var pie = d3.layout.pie().sort(null).value(function(d) { return d.value; });

    var g = svg.selectAll('.arc')
      .data(pie(pieData))
      .enter().append('g').attr('class', 'arc');

    g.append('path')
      .attr('fill', function(d) { return d.data.color; })
      .attr('d', arc)
      .each(function(d) { this._current = d; })
      .transition()
      .duration(1000)
      .attrTween('d', function(d) {
        var i = d3.interpolate({ startAngle: 0, endAngle: 0 }, d);
        return function(t) { return arc(i(t)); };
      });

    g.append('text')
      .attr('transform', function(d) {
        return 'translate(' + arc.centroid(d) + ')';
      })
      .attr('dy', '.35em')
      .style('text-anchor', 'middle')
      .style('fill', '#111')
      .style('font-size', '20px')
      .each(function(d) {
        var lines = d.data.title.split('<br>');
        for (var i = 0; i < lines.length; i++) {
          // Ajuste para "Outro"
          var xAdjust = 0;
          if (d.data.title.indexOf('Pendentes') !== -1) xAdjust = -14;
          if (d.data.title.indexOf('Outro') !== -1) xAdjust = -28; // mais deslocado para a esquerda
          d3.select(this).append('tspan')
            .attr('x', xAdjust)
            .attr('dy', i === 0 ? 0 : '1.2em')
            .text(lines[i].trim());
        }
      });
  }

  function drawLineChart(elementId, lineData, customWidth, customHeight) {
    var parseDate = d3.time.format('%Y-%m-%d').parse;
    lineData.forEach(function(d) { d.date = parseDate(d.date); });

    var margin = { top: 20, right: 20, bottom: 30, left: 50 },
        width = customWidth || 400 - margin.left - margin.right,
        height = customHeight || 300 - margin.top - margin.bottom;

    var x = d3.time.scale().range([0, width]);
    var y = d3.scale.linear().range([height, 0]);

    var line = d3.svg.line()
      .x(function(d) { return x(d.date); })
      .y(function(d) { return y(d.value); });

    var svg = d3.select('#' + elementId).append('svg')
      .attr('width', width + margin.left + margin.right)
      .attr('height', height + margin.top + margin.bottom)
      .append('g')
      .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');

    x.domain(d3.extent(lineData, function(d) { return d.date; }));
    y.domain([0, d3.max(lineData, function(d) { return d.value; })]);

    var path = svg.append('path')
      .datum(lineData)
      .attr('class', 'lineChart--areaLine')
      .attr('fill', 'none')
      .attr('stroke', 'steelblue')
      .attr('stroke-width', 2)
      .attr('d', line);

    // ANIMAÇÃO DA LINHA
    var totalLength = path.node().getTotalLength();
    path
      .attr('stroke-dasharray', totalLength + ' ' + totalLength)
      .attr('stroke-dashoffset', totalLength)
      .transition()
      .duration(1200)
      .ease('linear')
      .attr('stroke-dashoffset', 0);

    // Eixos
    svg.append('g')
      .attr('transform', 'translate(0,' + height + ')')
      .call(
        d3.svg.axis()
          .scale(x)
          .orient('bottom')
          .ticks(6)
          .tickFormat(function(d) {
            var meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
            return meses[d.getMonth()];
          })
      );

    svg.append('g')
      .call(
        d3.svg.axis()
          .scale(y)
          .orient('left')
          .ticks(6) // diminua para 6 ou 5
      );
  }

  if (document.getElementById('pieChart')) {
    drawPieChart('pieChart', data.pieChart, 480, 310); // tamanho maior
  }
  if (document.getElementById('lineChart')) {
    drawLineChart('lineChart', data.lineChart, 480, 260); // tamanho maior
  }
  if (document.getElementById('pieChart2')) {
    var containerEl = document.getElementById('pieChart2'),
        width = 400,
        height = 240,
        radius = Math.min(width, height) / 2;

    var svg = d3.select(containerEl).append('svg')
      .attr('width', width)
      .attr('height', height)
      .append('g')
      .attr('transform', 'translate(' + width / 2 + ',' + height / 2 + ')');

    var arc = d3.svg.arc().outerRadius(radius - 10).innerRadius(0);
    var pie = d3.layout.pie().sort(null).value(function(d) { return d.value; });

    var g = svg.selectAll('.arc')
      .data(pie(data.pieChart2))
      .enter().append('g').attr('class', 'arc');

    g.append('path')
      .attr('fill', function(d) { return d.data.color; })
      .attr('d', arc);

    g.append('text')
      .attr('transform', function(d) {
        return 'translate(' + arc.centroid(d) + ')';
      })
      .attr('dy', '.35em')
      .style('text-anchor', 'middle')
      .style('fill', '#111')
      .style('font-size', '15px') // fonte maior só para gráfico 2
      .each(function(d) {
        var lines = d.data.title.split('<br>');
        for (var i = 0; i < lines.length; i++) {
          var xAdjust = (d.data.title.indexOf('Pendentes') !== -1) ? -18 : 0;
          d3.select(this).append('tspan')
            .attr('x', xAdjust)
            .attr('dy', i === 0 ? 0 : '1.2em')
            .text(lines[i].trim());
        }
      });
  }
  if (document.getElementById('lineChart2')) {
    var parseDate = d3.time.format('%Y-%m-%d').parse;
    data.lineChart2.forEach(function(d) { d.date = parseDate(d.date); });

    var margin = { top: 20, right: 20, bottom: 30, left: 50 },
        width = 400 - margin.left - margin.right,
        height = 240 - margin.top - margin.bottom;

    var x = d3.time.scale().range([0, width]);
    var y = d3.scale.linear().range([height, 0]);

    var line = d3.svg.line()
      .x(function(d) { return x(d.date); })
      .y(function(d) { return y(d.value); });

    var svg = d3.select('#lineChart2').append('svg')
      .attr('width', width + margin.left + margin.right)
      .attr('height', height + margin.top + margin.bottom)
      .append('g')
      .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');

    x.domain(d3.extent(data.lineChart2, function(d) { return d.date; }));
    y.domain([0, d3.max(data.lineChart2, function(d) { return d.value; })]);

    var path = svg.append('path')
      .datum(data.lineChart2)
      .attr('class', 'lineChart--areaLine')
      .attr('fill', 'none')
      .attr('stroke', 'steelblue')
      .attr('stroke-width', 2)
      .attr('d', line);

    var totalLength = path.node().getTotalLength();
    path
      .attr('stroke-dasharray', totalLength + ' ' + totalLength)
      .attr('stroke-dashoffset', totalLength)
      .transition()
      .duration(1200)
      .ease('linear')
      .attr('stroke-dashoffset', 0);

    svg.append('g')
      .attr('transform', 'translate(0,' + height + ')')
      .call(d3.svg.axis().scale(x).orient('bottom').ticks(6).tickFormat(function(d) {
        var meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
        return meses[d.getMonth()];
      }));

    svg.append('g')
      .call(d3.svg.axis().scale(y).orient('left').ticks(6));
  }
})();