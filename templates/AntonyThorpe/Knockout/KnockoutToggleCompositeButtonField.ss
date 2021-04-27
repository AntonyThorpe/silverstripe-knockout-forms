<div $AttributesHTML>
    <div class="form-inline">
        <% if $LabelClass == 'left' %>
            <label class="form-check-label $LabelClass" for="$ID">
                <h$HeadingLevel>$Title</h$HeadingLevel>
            </label>
        <% end_if %>
        <button data-bind="click: function(){ {$Observable}(!{$Observable}());
  }" class="btn btn-primary btn-sm mb-2 ml-2 mr-2" type="button" aria-expanded="false" aria-controls="toggle">
            <%t Knockout.ToggleCompositeButton "Yes/No" %>
        </button>
        <% if $LabelClass != 'left' %>
            <label class="form-check-label $LabelClass" for="$ID">
                <h$HeadingLevel>$Title</h$HeadingLevel>
            </label>
        <% end_if %>
    </div>
    <% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
    <% if $Description %><span class="description">$Description</span><% end_if %>
<div data-bind="$BindingType: $Observable<% if $Value %>, setKnockout:{value:'$Value.JS'}<% end_if %><% if $OtherBindings %>, $OtherBindings<% end_if %><% if $HasFocus %>, hasFocus: true<% end_if %>" style="display:none">
		<% loop $FieldList %>
			$FieldHolder
		<% end_loop %>
	</div>
</div>
