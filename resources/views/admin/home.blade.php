@extends('admin.layouts.app')

@section('content')
<div class="total-shares">Total shares: {!! $total_shares !!} (Datetime at the moment: {!! $current_time !!})</div>
<span class="shares-detail">Facebook shares: {!! $fb_shares !!} | Twitter shares: {!! $tw_shares !!} | Google+ shares: {!! $gp_shares !!} | LinkedIn shares: {!! $ln_shares !!}</span>
<span class="barhead">Shares in last 12 hours:</span>
<div id="sharesbar"></div>
<div class="legends">
    <span class="fb-legend">Facebook</span>
    <span class="tw-legend">Twitter</span>
    <span class="ln-legend">LinkedIn</span>
    <span class="gp-legend">Google+</span>
</div>
{!! HTML::script('https://code.jquery.com/jquery-2.2.1.min.js'); !!}
{!! HTML::script('/js/jit.js'); !!}
<script>
    var json = {!! $gg !!};
    var barChart = new $jit.BarChart({
      injectInto: 'sharesbar',
      animate: true,
      orientation: 'vertical',
      barsOffset: 15,
      offset:10,
      labelOffset:5,
      type:'grouped',
      showAggregates:true,
      showLabels:true,
      Label: {
        size: 13,
        family: 'Arial',
        color: '#000000'
      }
  });
  barChart.loadJSON(json);
</script>

@endsection
