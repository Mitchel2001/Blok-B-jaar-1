import cv2
import pytesseract
import mysql.connector

# Maak verbinding met de database
db = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="goldenbulls"
)

# Maak een cursor-object
cursor = db.cursor()

# Voer de SQL-query uit
cursor.execute("SELECT kenteken FROM kentekens")

# Haal de gegevens op
kenteken = cursor.fetchone()[0]




pytesseract.pytesseract.tesseract_cmd = r'c:\Program Files\Tesseract-OCR\tesseract.exe'  

# Functie voor kentekenherkenning
def detect_license_plate(frame):
    # Converteer het frame naar grijswaarden
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)



    # Voer tekstherkenning uit met Tesseract
    custom_config = r'--oem 3 --psm 6 outputbase -l nld' 
    license_plate_text = pytesseract.image_to_string(gray, config=custom_config)

    print("Kentekenplaat tekst:", license_plate_text)

    
    #if license_plate_text.strip() == "ZD-465-H":
     #print("Slagboom open!")
     #return True  # Return True when the license plate is found

    if (kenteken) in license_plate_text:
        print("Slagboom open")  # Print "Slagboom open" when the license plate contains "ZD-465-H"
        return True

    return False

# Functie om de camerastroom vast te leggen
def capture_camera():
    cap = cv2.VideoCapture(0)  # 0 geeft de standaardcamera aan, maar dit kan worden aangepast afhankelijk van de configuratie

    while True:
        ret, frame = cap.read()

        if not ret:
            print("Fout bij het vastleggen van het beeld.")
            break

        # Voer kentekenherkenning uit
        if detect_license_plate(frame):  # Break the loop if detect_license_plate returns True
            break

        # Toon het frame
        cv2.imshow("Kentekenherkenning", frame)

        # Onderbreek de lus als de gebruiker op 'q' drukt
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break

      # Stop de camerastream en sluit het venster
    cap.release()
    cv2.destroyAllWindows()

# Start het programma
capture_camera()
