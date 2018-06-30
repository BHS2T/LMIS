import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;

public class TestAddSTT {
    public void addSTT(){
        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/AddSampleToTest.php");

        WebElement customerId =    driver.findElement(By.id("customerId"));
        WebElement amountTBT =   driver.findElement(By.id("amountToBeTested"));
        Select standardReference = new Select(driver.findElement(By.name("standardreference")));
        Select sampleName = new Select(driver.findElement(By.name("sampleNameToBeTested")));
        WebElement dueDate = driver.findElement(By.name("duedate"));
        Select samplingType = new Select(driver.findElement(By.name("typeOfSampleToBeTested")));
        WebElement addSttBtn =   driver.findElement(By.id("addsttBtn"));

        customerId.sendKeys("1234567890");
        sampleName.selectByIndex(1);
        standardReference.selectByIndex(1);
        amountTBT.sendKeys("23");
        dueDate.sendKeys("09252018");
        samplingType.selectByIndex(1);
        addSttBtn.click();

        //confirmation

        WebElement confirmAddBtn =   driver.findElement(By.id("confirmAdditionD"));
        confirmAddBtn.click();
        //success notifier dialogue
        try{
            WebElement success =driver.findElement(By.id("page2"));
            System.out.println("TEST ADD STT PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST ADD STT FAILED");

        }
        driver.close();
    }
}
