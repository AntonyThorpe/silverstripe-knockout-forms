<div <% if $OtherBindings %>data-bind="$OtherBindings"<% end_if %><% if $HasFocus %>, hasFocus: true<% end_if %>id="$HolderID" class="field knockoutswitch custom-control custom-switch">
	$Field
    <label class="right custom-control-label" for="$ID">$Title</label>
	<% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
	<% if $Description %><span class="description">$Description</span><% end_if %>
</div>
