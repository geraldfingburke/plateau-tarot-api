# Plateau Tarot API

A simple API for accessiu-tarong a basic tarot deck

# Instructions

The basic query is:

`https://indiealchemy.com/apis/plateautarot/`

This will get you all 78 cards in a JSON array. They will be shuffled using Fisher-Yates

You can use GET to specify:

id: int (1-78)
count: int (1-78)
arcana: string (major, minor)
suit: string (cups, wands, swords, pentacles)

A query of :

`https://indiealchemy.com/apis/plateautarot/?count=2&arcana=major`

Will yield two cards of the major arcana.

# Structure

```
{"cards":[{
"name":"Page of Pentacles",
"arcana":"Minor",
"suit":"Pentacles",
"description":"This card represents a practical minded person who is good with their finances. They have a talent for making money and the ambition to use it.",
"rank":"Page",
"symbols":"Wealth. Status. Youth.",
"imageURL":"https:\/\/indiealchemy.com\/apis\/plateautarot\/images\/Page of Pentacles.jpg",
"id":75
}]}
```

imageURL points to a directory of card images on our server. If you need local copies, just feel free to visit:

`https://indiealchemy.com/apis/plateautarot/images`

And pull them from there. You can also visit:

`https://luciellaes.itch.io/rider-waite-smith-tarot-cards-cc0`

Which was our source for the images

#Credits

All card details were written and prepared by Josh Petty @ BrainJar Games

Images were provided by Luciella Elisabeth Scarlett (this is not an endorsement of the API)

I wrote the icky PHP stuff.

#License

We're using the 'unlicense' which is functionally CC0 or public domain, but also suggests that I'm not a fan of copyright in general. 
Do what you want with it. Credit me if you like.

#Contributing

This is pretty barebones, but I'm not really sure what all the things you might need to do with a tarot deck api are.
If you think of something and want to add it yourself, make a PR.
If you think of something and don't want to add it yourself, make an issue.
If you think of something and don't want to do either, wish as hard as you feel comfortable wishing and I will try to get to it.
