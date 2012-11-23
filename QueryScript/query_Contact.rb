# DO NOT USE THESE CODE and 



require 'rdf'
require "rdf-agraph"
require 'rdf/ntriples'

openisdm = RDF::Vocabulary.new("http://openisdm.iis.sinica.edu.tw/#")
place = RDF::Vocabulary.new("http://purl.org/ontology/places#")
owl = RDF::Vocabulary.new("http://www.w3.org/2002/07/owl#")
schema = RDF::Vocabulary.new("http://schema.org/")
dbpedia = RDF::Vocabulary.new("http://dbpedia.org/resource/")
gr = RDF::Vocabulary.new("http://purl.org/goodrelations/v1#")

company = RDF::Vocabulary.new("http://Tour_Company")

REPOSITORY_URL = "http://rails:iis404@vrtestbed.iis.sinica.edu.tw:10035/repositories/product_rssfeeds"
REPOSITORY = RDF::AllegroGraph::Repository.new(REPOSITORY_URL)

#REPOSITORY.query(:subject => openisdm.debris_alert_1) do |statement|
#	puts statement
#end

GroupIDArray = []
readfname = "QueryScript/QueryResult/GroupID.txt"
#readfname = "QueryResult/GroupID.txt"

readfile = File.open(readfname, "r") do |f|
	f.each_line do |line|
    GroupIDArray.push(line)
  end
end
#readfile.close

#puts GroupIDArray


openfname = "QueryScript/QueryResult/Contact.txt"
#openfname = "QueryResult/Contact.txt"
openfile = File.open(openfname, "w")
writefile = File.open(openfname, "a")
# Company_1
# =============================
REPOSITORY.build_query do |q|
	q << [company._1, gr.legalName, :name] 	
end.run do |result|
	@company1_name = result.name
end

REPOSITORY.build_query do |q|	
 	q << [company._1, schema.telephone, :number]
end.run do |result|
	@company1_number = result.number
end

REPOSITORY.build_query do |q|
	q << [company._1, gr.owns, :groups]
end.run do |result|
	writefile.puts "#{@company1_name}, #{@company1_number}, #{result.groups}"
	puts "#{@company1_name},#{@company1_number},#{result.groups}"
end


# Company_2
# =============================
REPOSITORY.build_query do |q|
	q << [company._2, gr.legalName, :name] 	
end.run do |result|
	@company2_name = result.name
end

REPOSITORY.build_query do |q|	
 	q << [company._2, schema.telephone, :number]
end.run do |result|
	@company2_number = result.number
end

REPOSITORY.build_query do |q|
	q << [company._2, gr.owns, :groups]
end.run do |result|
	writefile.puts "#{@company2_name}, #{@company2_number}, #{result.groups}"
	puts "#{@company2_name},#{@company2_number},#{result.groups}"
end


# Company_3
# =============================
REPOSITORY.build_query do |q|
	q << [company._3, gr.legalName, :name] 	
end.run do |result|
	@company3_name = result.name
end

REPOSITORY.build_query do |q|	
 	q << [company._3, schema.telephone, :number]
end.run do |result|
	@company3_number = result.number
end

REPOSITORY.build_query do |q|
	q << [company._3, gr.owns, :groups]
end.run do |result|
	writefile.puts "#{@company3_name}, #{@company3_number}, #{result.groups}"
	puts "#{@company3_name},#{@company3_number},#{result.groups}"
end

	#puts "#{result.GroupID}, #{result.name}, #{result.tel}"
#	writefile = File.open(fname, "a")
#	writefile.puts "#{result.GroupID}"
#	writefile.close	
writefile.close
openfile.close





