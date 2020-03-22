from catalog_item import app
import unittest


class TestApp(unittest.TestCase):
    def test_item(self):
        tester = app.test_client(self)
        response = tester.get('/catalog_items/1', content_type='application/json')

        id = 1
        result = {
            "id": 1,
            "title": "Gardens by the Bay Ticket in Singapore",
            "description": "An iconic Singapore destination, Gardens by the Bay is undoubtedly at the top of every visitor's itinerary to the city. Its waterfront gardens (Bay South, Bay East, and Bay Central) and conservatories (Flower Dome and Cloud Forest) as well as the newly opened Sun Pavilion, feature some of the most incredible man-made structures built to house flora and fauna from all over the world. Your Singapore Gardens by the Bay ticket gives you full access to the two conservatories and what's more, you can even enter directly with your Klook voucher. Learn about the powerful interconnectedness of ecology, see the tallest indoor waterfall, the walk amid the Supertree Grove. With countless attractions for both grown-ups and children, Gardens by the Bay in Singapore will certainly give you a day worth spent!",
            "price": 23.0,
            "photo_urls": [
                "https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1920,h_720,f_auto/w_80,x_15,y_15,g_south_west,l_klook_water/activities/9658ba79-Gardens-by-the-Bay/GardensbytheBayTicketinSingapore.webp",
                "https://res.klook.com/image/upload/c_crop,h_642,w_1620,x_0,y_0/c_fill,w_960,h_460,f_auto/w_80,x_15,y_15,g_south_west,l_klook_water/activities/iwo1crd6zemjnkzupipx.webp",
                "https://res.klook.com/image/upload/c_crop,h_334,w_842,x_0,y_30/c_fill,w_960,h_460,f_auto/w_80,x_15,y_15,g_south_west,l_klook_water/activities/clahbvpqgvqtcubytkpg.webp"
            ]
        }

        self.assertEqual(response.status_code, 200)
        #self.assertEqual(result, response.data)

    def test_item_invalid(self):
        tester = app.test_client(self)
        response = tester.get('/catalog_items/', content_type='application/json')

        self.assertEqual(response.status_code, 404)

    def test_search(self):
        tester = app.test_client(self)
        response = tester.get('/catalog_items/search/singapore', content_type='application/json')

        self.assertEqual(response.status_code, 200)
        
    def test_search_2(self):
        tester = app.test_client(self)
        response = tester.get('/catalog_items/search/fesfseafgawfgerg', content_type='application/json')

        self.assertEqual(response.status_code, 200)

if __name__ == "__main__":
    unittest.main()
