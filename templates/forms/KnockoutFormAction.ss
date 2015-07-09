<% if $UseButtonTag %>
	<button data-bind="enable: {$observable}, css:{ '{$DisabledClass}': !{$observable}() }" $AttributesHTML>
		<% if $ButtonContent %>$ButtonContent<% else %>$Title.XML<% end_if %>
	</button>
<% else %>
	<input data-bind="enable: {$observable}, css:{ '{$DisabledClass}': !{$observable}() }" $AttributesHTML />
<% end_if %>