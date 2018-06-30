import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;

public class TestSearchSTT {
    public void search(){
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

        driver.get("http://localhost/LIMS_V3.1/View/viewSampleToTest.php");

        WebElement searchField =    driver.findElement(By.id("dept"));
        WebElement searchBtn =   driver.findElement(By.id("searchBtn"));
        //we have entered lab designated no of sampletotest
        searchField.sendKeys("543a43b12a433af4");
        searchBtn.click();
        try{
            WebElement success =driver.findElement(By.id("searchTitle"));
            System.out.println("TEST SEARCH STT PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST SEARCH STT FAILED");

        }
        driver.close();
    }

}

