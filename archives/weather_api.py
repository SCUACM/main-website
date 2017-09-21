import urllib
import urllib2
import json

print 
print "API Example: Weather Finder"
cityName = raw_input("Please Enter a Location: ")


url = 'http://api.openweathermap.org/data/2.5/find'
values = {'q' : cityName,
          'mode' : 'json'}

# Format of an http GET request
# http://api.openweathermap.org/data/2.5/find?q=<<_LOCATION_>>&mode=json 

# This creates the URL to the format of a GET response
URL_GET_REQUEST = url + '?' + urllib.urlencode(values)


# printing explination
print 
print "The API we are using is Open Weather Map."
print "Documentation: http://openweathermap.org/API"
print 
print "In this example, we want a basic query that outpus JSON."
print "Our GET Request should look like http://api.openweathermap.org/data/2.5/find?q=<<_LOCATION_>>&mode=json"
print
print "Our querey for location is: " + cityName
print
print "Therefore, the URL we are sending looks like this:"
print URL_GET_REQUEST
print


print "...Getting Data From Site..."
print "...This might take some time..."
print

# This sends the request and returns a response object
response = urllib2.urlopen(URL_GET_REQUEST)

# This reads the response and returns a string
raw_json_string = response.read()

#printing explination
print "The JSON response we are getting looks like this:"
print raw_json_string
print 
print "JSON is a string. We call a json decoding library to decode the json into an object usable by us."
print "In Python, this is a Dictionary, otherwise known as an associative array."
print "Using the loads method provided in the JSON library will return a Dictionary."
print

data = json.loads( raw_json_string )


print "The Open Weather Map API documentation should tell you how to parse the data."
print "More importantly, the documentation will tell you how you should properly handle the data"
print
print "With Open Weather Map, the first thing we want to check is that we have results."
print
print "We do this by checking the associative array created with the JSON response string (let's name this object as 'data' from now on)"
print 'We first check if data["count"] is greater than 1'
print '    data["count"] has', data["count"], "element(s)"
print

if data["count"] == 0:
    print "In this case, we do not have any weather info in our response, so we cannot continue"
    print "Try again with a different location querey"
    exit()


print "Since we have 1 or more responses, we can go ahead and display the response(s)"
print 'Notice in the JSON string response where it says "list":[ {...SOMETHING_HERE...} ]'
print 'This refers to a list object; data["list"] is a list of associative arrays'
print
print "By now, you should have a general understanding of how to use JSON data!"
print "The output below will be the weather in the cities listed in the json response"
print

# iterates through all of the city associative arrays in the list
for city in data["list"]:
    print "City: ", city["name"]
    print "Country: ", city["sys"]["country"]
    print "Temperature: ", city["main"]["temp"]
    print "Weather: ", city["weather"][0]["main"]
    print "Description: ", city["weather"][0]["description"]
    print "Pressure: ", "replace here with pressure info"
    print "Humidity: ", "replace here with humidity info"



print
print "Your task: Try opening this file and see if you can display the pressure and the humidity as well!"
print





