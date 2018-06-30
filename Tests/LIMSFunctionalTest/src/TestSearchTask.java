import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;

public class TestSearchTask {
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

        driver.get("http://localhost/LIMS_V3.1/View/viewTask.php");

        WebElement searchField =    driver.findElement(By.id("dept"));
        WebElement searchBtn =   driver.findElement(By.id("searchBtn"));
        //we have entered taskid
        searchField.sendKeys("1");
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

