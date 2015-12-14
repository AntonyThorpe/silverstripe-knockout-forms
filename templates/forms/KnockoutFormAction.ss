<% if $UseButtonTag %>
	<button data-bind="enable: {$observable}, css:{ '{$DisabledClass}': !{$observable}() }<% if $OtherBindings %>, $OtherBindings<% end_if %>" $AttributesHTML>
		<% if $ButtonContent %>$ButtonContent<% else %>$Title.XML<% end_if %>
	</button>
<% else %>
	<input data-bind="enable: {$observable}, css:{ '{$DisabledClass}': !{$observable}() }<% if $OtherBindings %>, $OtherBindings<% end_if %>" $AttributesHTML />
<% end_if %>