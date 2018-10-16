<aside class="photofromlastyear">

		<h2>Translate</h2>
		<p>There are varies poem with different transalte you can browse them by thier transalte languages </p>
		<div class="row">

				@foreach ($translates as $translate)
				<div class="col tran">
						<p class="translate"><button class="w3-btn w3-white w3-border w3-border-red w3-round-xlarge"><a href="/poems/translates/{{ $translate->language }}">{{ $translate->language }}</a></button></p>

				</div>
				@endforeach
		</div>
		
</aside>
