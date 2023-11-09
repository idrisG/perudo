<?php
function html_header($title)
{
	echo "<!DOCTYPE html>\n";
	echo "<html lang=\"fr\">\n";
	echo "<head>\n";
	echo "	<title>".$title."</title>\n";
	echo "	<meta charset=\"utf-8\">\n";
	echo "	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
	echo "	<meta http-equiv=\"refresh\" content=\"5\" />";
	echo "	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
	echo "	<link type=\"text/css\" rel=\"stylesheet\" href=\"css/bootstrap.min.css\"/>\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<div class=\"container\">\n";
}
function html_footer()
{
	echo "</div>\n";
	echo "</body>\n";
	echo "</html>\n";
}

?>