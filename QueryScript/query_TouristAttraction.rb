require 'rdf'
require "rdf-agraph"

openisdm = RDF::Vocabulary.new("http://openisdm.iis.sinica.edu.tw/#")
place = RDF::Vocabulary.new("http://purl.org/ontology/places#")
owl = RDF::Vocabulary.new("http://www.w3.org/2002/07/owl#")
schema = RDF::Vocabulary.new("http://schema.org/")
dbpedia = RDF::Vocabulary.new("http://dbpedia.org/resource/")


REPOSITORY_URL = "http://rails:iis404@vrtestbed.iis.sinica.edu.tw:10035/repositories/product_rssfeeds"
REPOSITORY = RDF::AllegroGraph::Repository.new(REPOSITORY_URL)

#REPOSITORY.query(:subject => openisdm.debris_alert_1) do |statement|
#	puts statement
#end

fname = "QueryScript/QueryResult/TouristAttraction.txt"
#fname = "QueryResult/TouristAttraction.txt"
openfile = File.open(fname, "w")

REPOSITORY.build_query do |q|
	q.pattern [dbpedia.Xiulin_Hualien, schema.TouristAttraction, :TouristAttraction]
end.run do |result|
	puts result.TouristAttraction
	writefile = File.open(fname, "a")
	writefile.puts result.TouristAttraction
	writefile.close	
end

openfile.close




