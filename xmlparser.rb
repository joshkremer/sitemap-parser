require 'sitemap-parser'
require 'csv'
sitemap = SitemapParser.new "https://newdistrict.ca/sitemap.xml"
sitemap.urls # => Array of Nokigiri XML::Node objects
sitemap.to_a # => Array of url strings

link_array = sitemap.to_a

puts link_array

link_array.each do |i|
	CSV.open("file.csv", "a+") do |csv|
	  csv << [i]
  end
end
