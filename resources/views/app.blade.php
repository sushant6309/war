@extends('layouts.layout')

@section('content')
	<header class="intro-header" style="background-image: url('{{asset('assets/img/home-bg.jpg')}}')">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="site-heading">
						<h1>Guyz Its War Time</h1>
						<hr class="small">
						<span class="subheading">A Clean War Theme by Sushant</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="post-preview">
					<a href="javascript:;">
						<h2 class="post-title">
							Man must explore, and this is exploration at its greatest
						</h2>
						<h3 class="post-subtitle">
							Problems look mighty small from 150 miles up
						</h3>
					</a>
					<p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
				</div>
				<hr>
				<!-- Pager -->
				<ul class="pager">
					<li class="next">
						<a href="{{route('war.form')}}">Lets War &rarr;</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop

@section('JS')

@stop