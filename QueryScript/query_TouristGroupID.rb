require 'rdf'
require "rdf-agraph"

openisdm = RDF::Vocabulary.new("http://openisdm.iis.sinica.edu.tw/#")
openisdmTA = RDF::Vocabulary.new("http://openisdm.iis.sinica.edu.tw/#TouristAttraction/")
place = RDF::Vocabulary.new("http://purl.org/ontology/places#")
owl = RDF::Vocabulary.new("http://www.w3.org/2002/07/owl#")
schema = RDF::Vocabulary.new("http://schema.org/")
dbpedia = RDF::Vocabulary.new("http://dbpedia.org/resource/")


REPOSITORY_URL = "http://rails:iis404@vrtestbed.iis.sinica.edu.tw:10035/repositories/product_rssfeeds"
REPOSITORY = RDF::AllegroGraph::Repository.new(REPOSITORY_URL)

#REPOSITORY.query(:subject => openisdm.debris_alert_1) do |statement|
#	puts statement
#end

fname = "QueryScript/QueryResult/GroupID.txt"
#fname = "QueryResult/GroupID.txt"
openfile = File.open(fname, "w")

REPOSITORY.build_query do |q|
	q.pattern [openisdmTA.Taroko_National_Park, openisdm.hasTouristGroupID, :GroupID]
end.run do |result|
	puts result.GroupID
	writefile = File.open(fname, "a")
	writefile.puts result.GroupID
	writefile.close	
end

openfile.close



