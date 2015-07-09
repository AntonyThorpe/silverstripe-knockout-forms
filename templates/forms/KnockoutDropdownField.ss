<select data-bind="{$BindingType}: {$Observable}<% if $Value %>, setKnockout:{value:'{$Value}'}<% end_if %><% if $OtherBindings %>, {$OtherBindings}<% end_if %><% if $HasFocus %>, hasFocus: true<% end_if %>" $AttributesHTML>
	<% loop $Options %>
		<option value="$Value.XML"<% if $Selected %> selected="selected"<% end_if %><% if $Disabled %> disabled="disabled"<% end_if %>>$Title.XML</option>
	<% end_loop %>
</select>
