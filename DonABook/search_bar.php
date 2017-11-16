
<div class="header-container header-search" id="site-search" role="search">
		<form method="POST" action="SearchedBooks.php">
			<ul class="unorder-list1">
			<span style="color:#ffffff;">
			<select class="select-items " data-autowidth="true" title="Search category" name="search_category" data-current-category-name="All Categories" data-current-category="all"  aria-invalid: "false" style="">
			<option value="all" selected="" data-category-default="">All</option>
			<option value="mathematics">Mathematics</option>
			<option value="science">Science</option>
			<option value="english">English</option>
			<option value="commerce">Commerce</option>
			<option value="programming">Programming</option>
			<option value="computer">Computer</option>
			<option value="miscellineous">Miscellineous</option>
			</select>
			</span>
			
			<span><input type="text" class="clear-input-wrapper" onkeyup="Looking();" name="search" id="header-search" title="Search by keyword" autocomplete="off" placeholder="I'm looking for..."  aria-autocomplete="list" aria-owns="header-search" data-type-ahead="channel:search"><ul class="list-group" id="looking_list_id" style="padding-left:19%;width:66.0%;z-index:2000;position:absolute;">
            </ul></span>
			
			

			<label class="header-search-in" style="padding:0 0 0 7.5px; color:#ffffff;" for="header-search-location">
			IN
			</label>
			
			
			<span class="clear-input-wrapper"><input type="text" onkeyup="Location();" name="search_location" placeholder="City" title="Location" id="header-search-location" autocomplete="off" data-type-ahead="channel:location" aria-autocomplete="list" aria-owns="header-search-location-type-ahead"  style=" width: 213.34px; height:35px; border: 1px solid transparent; border-radius: 2px;  font-family: Source Sans Pro,Arial,sans-serif; font-size: 16px; line-height: 20px; padding: 5px 8px;"><ul  class="list-group" id="location_list_id" style="margin-left:69%;width:211.3px;z-index:2000;position:absolute;">
           </ul></span>	
				
			<span class="header-search-submit">
			<button type="submit" class="btn-primary2 btn-icon" name="search-gumtree" data-submit-ignore="" style="height: 35px; width: 41px; padding:0px; border:1px solid transparent;">
            Go
            </button>
			</span>
			</ul>
			
			

	</form>
	<script src="js/looking.js"></script>
</div>


	