<select data-bind="$BindingType: $Observable<% if $Value %>, setKnockout:{value:'$Value.JS'}<% end_if %><% if $OtherBindings %>, $OtherBindings <% end_if %><% if $HasFocus %>, hasFocus: true<% end_if %>" $AttributesHTML >
<% loop $Options %>
	<option value="$Value.XML"
		<% if $Selected %> selected="selected"<% end_if %>
		<% if $Disabled %> disabled="disabled"<% end_if %>
		><% if $Title.exists %>$Title.XML<% else %>&nbsp;<% end_if %>
	</option>
<% end_loop %>
</select>
