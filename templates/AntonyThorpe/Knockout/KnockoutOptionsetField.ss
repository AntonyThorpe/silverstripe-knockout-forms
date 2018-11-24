<ul $AttributesHTML>
	<% loop $Options %>
		<li class="$Class">
			<input data-bind="$Up.BindingType: $Up.Observable<% if $isChecked %>, setKnockout:{value:'$Value.JS'}<% if $Up.HasFocus %>, hasFocus: true<% end_if %><% end_if %><% if $Up.OtherBindings %>, $Up.OtherBindings<% end_if %>" id="$ID" class="radio" name="$Name" type="radio" value="$Value"<% if $isChecked %> checked<% end_if %><% if $isDisabled %> disabled<% end_if %> <% if $Up.Required %>required<% end_if %> />
			<label for="$ID">$Title</label>
		</li>
	<% end_loop %>
</ul>
